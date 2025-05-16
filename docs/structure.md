## users

    - id
    - name
    - email
    - password
    - password_clue
    - role
    - status
    - title
    - first_name
    - last_name
    - other_name
    - dob
    - phone_number
    - phone_type [call, whatsapp]
    - profession
    - address
    - city
    - state
    - country
    - postal_code
    - nok [next of kins]
    - nok_relationship [friend, brother, sister, husband, wife, mother, father]
    - nok_phone_number
    - food_allergies [in arrays]
    - diets,
    - other_disability
    - center [center close to you]
        - picture
    - verification_status
    - status
    - email_verified_at

## roles

    - id
    - name
    - description
    - status [active 1 | inactive 0]

## user_roles

    - user_id
    - role_id

## centers

    - id
    - name
    - type [center, event, center and event, accommodation]
    - payment_id [payment id from paystack]
    - status

    ### locations
        - address
        - state
        - map url [google map]
        - contact_name [contact name for the event]
        - contact_phone_number [contact phone number of center]

## groups

    - name
    - description

## group_members

    - user_id
    - group_id

## events

    - center_id
    - name
    - type [workshop, retreat, seminars, recollection, quarterlies]
    - cost [amount for event paid to center account]
    - slots [number of slots bookable by users]

    - start_date [start date for the event]
    - end_date [end date for the event]
    - description
    - contact_name [contact name of the event organizer]
    - contact_phone_number [contact phone number for the organizers of the event]
    - status [active 1 | inactive 0]

## event_roles

    - event_id
    - role_id

## booked_events

    - user_id
    - event_id
    - approved_by [incase of manual approval]
    - payment_type [full_payment, installments | to be updated after successful installment request]
    - payment_amount [amount to be paid during booking]
    - paid [false | true]
    - status

## cancel_events

    - user_id
    - booked_event_id
    - amount_paid
    - message
    - refunded
    - status

## transactions

    - id
    - user_id
    - booked_event_id
    - amount [₦]
    - reference
    - payment_url
    - payment_status [payment service provider status]
    - psp [unknown | 'PSP : Payment Service Provider']
    - currency [NGN]
    - mode [transfer or card]
    - status

## users_installments

    - user_id
    - event_id
    - approved
    - approved_by
    - booked_event_id
    - amount [total amount]
    - paid  [amount currently paid]
    - balance [amount remaining]
    - settle [yes or no | send invoice email after full payment]

## user_installment_payments

    - user_id
    - event_id
    - transaction_id
    - user_installment_id

# users

-   view list available events
    -   view event details
-   book event
    -   add to booked event table
-   make payment
    -   request for installments
        -   approve installment user payment
        -   make installment payment
        -   update installment table
    -   full payment
        -   add to transaction table
        -   update tables [booked event, transactions]
        -   pay with paystack
    -   transaction payment is made
    -   get email notification about the booked event
    -   print payment invoice
-   view booked events

## Regular sh commands

````bash
    php -m | grep intl
    sudo apt-get update
    sudo apt-get install php-intl
    php -m | grep intl
    sudo systemctl restart apache2
    composer clear-cache
    composer dump-autoload
    php artisan serve

``





```code

     "id" => 5
      "name" => "Sexton Audra"
      "title" => "Mrs"
      "first_name" => "Audra"
      "last_name" => "Sexton"
      "other_name" => "Xandra Blankenship"
      "email" => "abdulsalamamtech@gmail.com"
      "dob" => "1975-07-24"
      "phone" => "+1 (679) 844-7429"
      "phone_type" => "mobile"
      "address" => "No. 54 Ratione ipsam sit au"
      "city" => "ikoyi"
      "state" => "Lagos"
      "country" => "Nigeria"
      "postal_code" => ""
      "nok" => "Saepe expedita deser"
      "nok_relationship" => "Exercitation atque v"
      "nok_phone" => "+1 (862) 281-3549"
      "food_allergies" => "Reprehenderit mollit"
      "diets" => """"
      "other_disability" => "Expedita neque esse"
      "center" => ""
      "picture" => "default.jpg"
      "password_clue" => "admin pass"
      "role" => "admin"
      "verification_status" => "false"
      "status" => "pending"
      "email_verified_at" => "2024-12-10 11:21:29"
      "password" => "$2y$12$CGRAPynid/MiynmjXN9BgeLY1cY.ZrLRccnLOk5TX9WuNu53uCNO2"
      "remember_token" => "DpNuQjXzkwM0HGCF2PXbWHXYZSreVSQDHuWFgiP6EhN3m86fHYK1ELC9ERBs"
      "deleted_at" => null
      "created_at" => "2024-12-10 10:43:00"
      "updated_at" => "2024-12-18 05:32:28"

````

## Show executed migration sql

```sh
php artisan migrate --pretend
```

```sql
create table "center_group" ("id" integer primary key autoincrement not null, "center_id" integer not null, "group_id" integer not null, "created_at" datetime, "updated_at" datetime, foreign key("center_id") references "centers"("id") on delete cascade, foreign key("group_id") references "groups"("id") on delete cascade)
```

## ERROR

```php
    $userId = auth()->user()->id;
    $events = Event::whereHas('center.groups.groupMember', function ($query) use ($userId) {
                $query->where('users.id', $userId);
            })->get();
    return $events;
```
column: users.id 
```sql
-- Error --
(Connection: sqlite, SQL: 
select * from "events" where exists 
(select * from "centers" where "events"."center_id" = "centers"."id" and exists 
(select * from "groups" inner join "center_group" on "groups"."id" = "center_group"."group_id" where "centers"."id" = "center_group"."center_id" and exists
(select * from "group_members" where "groups"."id" = "group_members"."group_id" and "users"."id" = 2) 
and "groups"."deleted_at" is null) 
and "centers"."deleted_at" is null) 
and "events"."deleted_at" is null)
```













```php
    $userId = auth()->user()->id;
    $events = Event::whereHas('center.groups.groupMember', function ($query) use ($userId) {
                $query->where('user_id', $userId);
            })->get();

    return $events;
```
```sql
-- Correction --
(Connection: sqlite, SQL: 
select * from "events" where exists 
(select * from "centers" where "events"."center_id" = "centers"."id" and exists 
(select * from "groups" inner join "center_group" on "groups"."id" = "center_group"."group_id" where "centers"."id" = "center_group"."center_id" and exists
(select * from "group_members" where "groups"."id" = "group_members"."group_id" and "users_id" = 2) 
and "groups"."deleted_at" is null) 
and "centers"."deleted_at" is null) 
and "events"."deleted_at" is null)
```
