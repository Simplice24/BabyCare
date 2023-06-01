<?php

namespace app\rbac;

use yii\rbac\DbManager;

class RbacManager
{
    public static function init()
    {
        $authManager = new DbManager;
        $authManager->init();

        // Create roles
        $adminRole = $authManager->createRole('Admin');
        $adminRole->description = 'Administrator';
        $authManager->add($adminRole);

        $babysitterRole = $authManager->createRole('Babysitter');
        $babysitterRole->description = 'Babysitter Role';
        $authManager->add($babysitterRole);

        $parentRole = $authManager->createRole('Parent');
        $parentRole->description = 'Parent Role';
        $authManager->add($parentRole);

        // Create permissions
        $barnUserPermission = $authManager->createPermission('Barn_user');
        $barnUserPermission->description = 'Barn User Permission';
        $authManager->add($barnUserPermission);

        $viewBookingsPermission = $authManager->createPermission('View_bookings');
        $viewBookingsPermission->description = 'View Bookings Permission';
        $authManager->add($viewBookingsPermission);

        $createAvailabilityPermission = $authManager->createPermission('Create_availability');
        $createAvailabilityPermission->description = 'Create Availability Permission';
        $authManager->add($createAvailabilityPermission);

        $updateAvailabilityPermission = $authManager->createPermission('Update_availability');
        $updateAvailabilityPermission->description = 'Update Availability Permission';
        $authManager->add($updateAvailabilityPermission);

        // Assign permissions to roles
        $authManager->addChild($adminRole, $barnUserPermission);
        $authManager->addChild($adminRole, $viewBookingsPermission);
        $authManager->addChild($adminRole, $createAvailabilityPermission);
        $authManager->addChild($adminRole, $updateAvailabilityPermission);

        $authManager->addChild($babysitterRole, $barnUserPermission);
        $authManager->addChild($babysitterRole, $viewBookingsPermission);

        $authManager->addChild($parentRole, $barnUserPermission);
        $authManager->addChild($parentRole, $viewBookingsPermission);
        $authManager->addChild($parentRole, $createAvailabilityPermission);
        $authManager->addChild($parentRole, $updateAvailabilityPermission);
    }
}
