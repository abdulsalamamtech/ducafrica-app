

## users
    - id
    - name
    - email
    - password

    - status

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

## cancel_events
    - event_id
    - user_id
    - amount_paid
    - status

## installment_users
    - user_id
    - added_id

## transactions
    - id
    - amount
    - reference
    - payment_url
    - currency [NGN]
    - mode
    - status

## payments
    - transaction_id
    - booked_event_id

## installment_payments
    - transaction_id
    - booked_event_id


