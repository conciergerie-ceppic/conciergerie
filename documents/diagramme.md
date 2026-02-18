#  Entités

## User
- id
- first_name
- last_name
- email
- phone
- address
- password
- role
- avatar
# Relations:
# - User 1 --- * Reservation (one-to-many)
# - User 1 --- * Message (as sender/receiver) (one-to-many)
# - User 1 --- * Notification (one-to-many)

## Service
- id
- name
- category
- description
- location
- availability
- link
# Relations:
# - Service * --- * Partner (many-to-many)
# - Service 1 --- * Reservation (one-to-many)

## Reservation
- id
- user_id
- service_id
- reservation_date
- status
# Relations:
# - Reservation * --- 1 User (many-to-one)
# - Reservation * --- 1 Service (many-to-one)

## Message
- id
- sender_id
- receiver_id
- content
- send_date
# Relations:
# - Message * --- 1 User (as sender) (many-to-one)
# - Message * --- 1 User (as receiver) (many-to-one)

## Partner
- id
- name
- contact
- offered_services
# Relations:
# - Partner * --- * Service (many-to-many)

## Notification
- id
- user_id
- content
- date
# Relations:
# - Notification * --- 1 User (many-to-one)
