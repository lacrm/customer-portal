Please refer first to [UPGRADE.md](UPGRADE.md) for the most important items that should be addressed before attempting to upgrade or during the upgrade of a vanilla Oro application.

The current file describes significant changes in the code that may affect the upgrade of your customizations.

## 3.1.4 

### Removed
#### CommerceMenuBundle
* Service `oro_commerce_menu.namespace_migration_provider`

#### FrontendBundle
* Services `oro_frontend.namespace_migration_provider`, `oro_frontend.namespace_migration_fix_product_provider` and the logic that used them were removed.

## 3.1.0

### Changed
#### CustomerBundle
* The field `username` was removed from `/admin/api/customerusers` REST API resource.
* The `frontend_owner_type` entity configuration attribute for Customer entity is set to `FRONTEND_CUSTOMER`.
  The `Full` access level was changed to `Сorporate (All Levels)` for Customer entity for `ROLE_FRONTEND_ADMINISTRATOR` customer user role.
  For all other customer user roles the `Full` access level was changed to `Department (Same Level)`.

## 3.1.0-rc (2018-11-30)
[Show detailed list of changes](incompatibilities-3-1-rc.md)

### Changed
#### CustomerBundle
* Changes in `/admin/api/customer_user_addresses` REST API resource:
    - the resource name was changed to `/admin/api/customeruseraddresses`
    - the attribute `created` was renamed to `createdAt`
    - the attribute `updated` was renamed to `updatedAt`
    - the relationship `frontendOwner` was renamed to `customerUser`
* The name for `/admin/api/customer_users` REST API resource was changed to `/admin/api/customerusers`.
* The name for `/admin/api/customer_user_roles` REST API resource was changed to `/admin/api/customeruserroles`.
* The name for `/admin/api/customer_groups` REST API resource was changed to `/admin/api/customergroups`.
* The name for `/admin/api/customer_rating` REST API resource was changed to `/admin/api/customerratings`.

## 3.1.0-beta (2018-09-27)
[Show detailed list of changes](incompatibilities-3-1-beta.md)

### Added
#### CustomerBundle
* A new email template `customer_user_welcome_email_registered_by_admin` was added. It is sent when the administrator or a customer user manager creates a new customer user with the "Send Welcome Email" option selected or when the administrator confirms a customer user from the management console.

### Changed
#### CustomerBundle
* Removed the `oro_customer.send_password_in_welcome_email` config option to prevent issues with security when a plain password is sent by email.
* There is no password provided while rendering the `customer_user_welcome_email` email template. Please update your customization of this email template. It is recommended to use a reset password link in the email template instead of a plain password.

## 3.0.0 (2018-07-27)
[Show detailed list of changes](incompatibilities-3-0.md)
### Changed
#### CustomerBundle
* The `CustomerGroup::customers` relation was removed as well as other related logic.

## 3.0.0-rc (2018-05-31)
[Show detailed list of changes](incompatibilities-3-0-rc.md)

## 3.0.0-beta (2018-03-30)
[Show detailed list of changes](incompatibilities-3-0-beta.md)

## 2.6.0 (2018-01-31)

### Changed
#### FrontendBundle
* Added `frontend` option for datagrids. This option should be set to `true` for all datagrids are used in the store frontend. For details see [Frontend Datagrids](./src/Oro/Bundle/FrontendBundle/Resources/doc/frontend-access.md#frontend-datagrids)

## 2.5.0 (2017-11-30)
[Show detailed list of changes](incompatibilities-2-5.md)
### Added
#### ACL
* In case when Customer Portal is installed together with CRM, the `Account Manager` role has full permissions for Account and Contact entities. The permissions for the `Account Manager` is not changed if Customer Portal is added to already installed CRM.

## 2.4.0 (2017-09-29)
[Show detailed list of changes](incompatibilities-2-4.md)

### Changed
#### FrontendBundle
* some inline underscore templates were moved to separate .html file for each template.
### Removed
#### CustomerBundle
* removed interface `ConstraintByValidationGroups`<sup>[[?]](https://github.com/oroinc/customer-portal/tree/2.4.0/src/Oro/Bundle/OrderBundle/Validator/Constraints/ConstraintByValidationGroups.php "Oro\Bundle\OrderBundle\Validator\Constraints\ConstraintByValidationGroups")</sup>.
* removed constraint class `OrderAddress`<sup>[[?]](https://github.com/oroinc/customer-portal/tree/2.4.0/src/Oro/Bundle/OrderBundle/Validator/Constraints/OrderAddress.php "Oro\Bundle\OrderBundle\Validator\Constraints\OrderAddress")</sup>.
* removed constraint validator `OrderAddressValidator`<sup>[[?]](https://github.com/oroinc/customer-portal/tree/2.4.0/src/Oro/Bundle/OrderBundle/Validator/Constraints/OrderAddressValidator.php "Oro\Bundle\OrderBundle\Validator\Constraints\OrderAddressValidator")</sup>.
## 2.3.0 (2017-07-28)
[Show detailed list of changes](incompatibilities-2-3.md)
### Changed
#### CustomerBundle
* the DI container parameter `oro_customer.entity.owners` was changed
    - the option `local_level` was renamed to `business_unit`
    - the option `basic_level` was renamed to `user`
### Removed
#### CustomerBundle
* class `RecordOwnerDataListener`<sup>[[?]](https://github.com/oroinc/customer-portal/tree/2.3.0/src/Oro/Bundle/CustomerBundle/EventListener/RecordOwnerDataListener.php "Oro\Bundle\CustomerBundle\EventListener\RecordOwnerDataListener")</sup>
    - constant `OWNER_TYPE_ACCOUNT` was removed, use `OWNER_TYPE_CUSTOMER` instead
## 2.2.0 (2017-05-31)
[Show detailed list of changes](incompatibilities-2-2.md)
