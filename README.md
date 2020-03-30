# Portail-Automatique
Mini Projet pour le lycée, ou l'interface web permet de contrôler un portail de maison, l'interface permet de voir les utilisateurs ayant ouvert ou fermés le portail. Le but du projet est de simplifier l'utilisation du portail avec un badge RFID, l'interface web nous permet d'ajouter un utilisateur en badgeant, par conséquent quand l'utilisateur est connue, le portail s'ouvre sinon il reste fermé. Il y a un système pour gérer les utilisateurs.

Vous trouverez seulement les fichiers de l'interface Web, il n'y a pas la partie Arduino, c'est pour cela que le fichier changeCode.php est vide. Pour ce qui est des utilisateurs, ils faut les ajouter manuel depuis la base de données. En vous rendant sur la page activity_test.php cela vous permet de simuler une ouverture du portail, qui s'ajoutera dans la basse de donnée.

Pour la base de données :

Il faut créer deux tables :
1 - users [id (AI), username (varchar(255)), password (varchar(255)), badgeID(int(11))]
2 - activity [id (AI), username (varchar(255)), day (date), hour (time)]
