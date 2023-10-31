<?php
$fileName = "roles.txt";
if (!file_exists($fileName)) {
    $rolesData = file_put_contents($fileName, null, FILE_APPEND);
} else {
    $rolesData = file_get_contents($fileName);
}
$roles = explode("\n", trim($rolesData));

function uniqueRole($email): bool
{
    global $roles;
    if(!$roles[0] == 0) {
        $emailIndex = 0;
        foreach ($roles as $roleData) {
            $roleData = trim($roleData);
            if($email === $roleData[$emailIndex])
            {
                return false;
            }
        }
    }
    return true;
}

function createRole($rolename)
{
    global $fileName;
    $roleData = "$rolename\n";
    return file_put_contents($fileName, $roleData, FILE_APPEND);
}

function deleteRole(string $rolename): bool
{
    global $fileName;
    global $roles;
    $role_buffer = "";
    $roleData = "$rolename";
    file_put_contents($fileName, $role_buffer);
    if(!in_array($roleData, $roles)) return false;
    foreach ($roles as $role) {
        if ($roleData === $role) {
            continue;
        } else {
            $role_buffer = $role . "\n";
            file_put_contents($fileName, $role_buffer, FILE_APPEND);
        }
    }
    return true;
}

function editRole(string $rolename, string $oldname): bool
{
    global $fileName;
    global $roles;
    $role_buffer = "";
    $roleData = "$rolename";
    file_put_contents($fileName, $role_buffer);
    if(!in_array($oldname, $roles)) return false;
    foreach ($roles as $role) {
        if ($oldname === $role) {
            $role_buffer = $rolename . "\n";
        } else {
            $role_buffer = $role . "\n";
        }
        file_put_contents($fileName, $role_buffer, FILE_APPEND);
    }
    return true;
}

function roles(): array
{
    global $roles;
    foreach ($roles as $roleData) {
        $roleData = trim($roleData);
        $roleRow = explode(",", $roleData);
        $row = ['name' => $roleRow[0]];
        $roleArray[] = $row;

    }
    return $roleArray;
}
