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

## user_roles

    - user_id
    - role_id

## centers

    - id
    - name
    - type [center, event, center and event, accommodation]
    - payment_id [payment id from paystack]

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
    - payment_type [full_payment, installments | to be updated after successful installment request]
    - status

## cancel_events

    - event_id
    - user_id
    - amount_paid
    - message
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

## transactions

    - id
    - amount [₦]
    - reference
    - payment_url
    - currency [NGN]
    - mode [transfer or card]
    - status


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
```bash
    php -m | grep intl
    sudo apt-get update
    sudo apt-get install php-intl
    php -m | grep intl
    sudo systemctl restart apache2
    composer clear-cache
    composer dump-autoload
    php artisan serve
    
``
