php bin/console messenger:consume async -vv --limit=10

Pour consommer les messages et recevoir dans https://mailtrap.io/inboxes/4430398/messages car ils sont mis en file d'attente

php bin/console messenger:stats

Vider le fil d'echec : php bin/console messenger:failed:remove 1 2 3 4

php bin/console messenger:failed:show
