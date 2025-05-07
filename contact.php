<?php
header('Content-Type: application/json'); // Asigură-te că răspunsul este JSON

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Preluare date
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    // Structura datelor
    $contact = [
        'name' => $name,
        'email' => $email,
        'message' => $message,
        'date' => date('Y-m-d H:i:s')
    ];

    // Citire date existente
    $file = 'contacte.json';

    // Verifică dacă fișierul există și are permisiuni de citire
    if (!file_exists($file)) {
        echo json_encode(['success' => false, 'message' => 'Fișierul contacte.json nu există.']);
        exit;
    }

    if (!is_writable($file)) {
        echo json_encode(['success' => false, 'message' => 'Fișierul contacte.json nu are permisiuni de scriere.']);
        exit;
    }

    $existing = json_decode(file_get_contents($file), true);
    if (!is_array($existing)) {
        $existing = [];
    }

    // Adăugare și salvare
    $existing[] = $contact;
    $success = file_put_contents($file, json_encode($existing, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

    // Verifică dacă fișierul s-a salvat cu succes
    if ($success !== false) {
        echo json_encode(['success' => true, 'message' => 'Mesajul a fost salvat cu succes.']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Eroare la salvarea datelor în fișier.']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Metoda de trimitere invalidă.']);
}
?>
