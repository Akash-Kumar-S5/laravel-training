<?php
// helpers.php
/**
 * @param $permissions
 * @return array
 */
if(!function_exists('getPermissionInRole')) {
    function getPermissionInRole($permissions) : array
    {
        $permissionsInRole = array();
        foreach ($permissions as $permissionName) {
            $permissionsInRole[] = $permissionName['name'];
        }
        return $permissionsInRole;
    }
}
