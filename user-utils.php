<?php
$fileName = "users.txt";
if (!file_exists($fileName)) {
    $usersData = file_put_contents($fileName, null, FILE_APPEND);
} else {
    $usersData = file_get_contents($fileName);
}
$users = explode("\n", trim($usersData));

function uniqueEmail($email): bool
{
    global $users;
    if(!$users[0] == 0) {
        $emailIndex = 0;
        foreach ($users as $userData) {
            $userData = trim($userData);
            $userRow = explode(",", $userData);
            if($email === $userRow[$emailIndex])
            {
                return false;
            }
        }
    }
    return true;
}

function userCreate($email, $username, $password, $defaultRole='user')
{
    global $fileName;
    $userData = "$email,$username,$password,$defaultRole\n";
    return file_put_contents($fileName, $userData, FILE_APPEND);
}

function userInfo($email): null|array
{
    global $users;
    foreach ($users as $userData) {
        $userData = trim($userData);
        $userRow = explode(",", $userData);
        if($email === $userRow[0])
        {
            return $userRow;
        }
    }
    return null;
}

function login($email, $password): bool
{
    global $users;
    $emailIndex = 0;
    $passwordIndex = 2;
    foreach ($users as $userData) {
        $userData = trim($userData);
        $userRow = explode(",", $userData);

        if ($email === $userRow[$emailIndex] && password_verify($password, $userRow[$passwordIndex])) {
            return true;
        }
    }
    return false;
}

function deleteUser(string $email)
{
    global $fileName;
    global $users;
    $user_buffer = "";
    $input_email = "$email";
    $allUsers = users();
    file_put_contents($fileName, $user_buffer);

    if(!in_array($input_email, array_column($allUsers,'email'))) return false;

    foreach ($users as $user) {
        if ($input_email === $allUsers['email']) {
            continue;
        } else {
            $user_buffer = $user. "\n";
            file_put_contents($fileName, $user_buffer, FILE_APPEND);
        }
    }
    return true;
}
function users(): array
{
    global $users;
    foreach ($users as $userData) {
        $userData = trim($userData);
        $userRow = explode(",", $userData);
        $row = array(
            'email' => $userRow[0],
            'name' => $userRow[1],
            'role' => $userRow[3]
        );
        $userArray[] = $row;
    }
    return $userArray;
}
