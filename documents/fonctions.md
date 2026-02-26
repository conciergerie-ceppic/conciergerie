# Fonctions déjà presentes avec Symfony pour les requetes SQL

- find($id)
- findAll()
- findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
- findOneBy(array $criteria)
- count(array $criteria)
- findBy(['avatar' => $valeur])
- findOneBy(['avatar' => $valeur])
- matching(Criteria $criteria)

- persist($entity) : prépare une entité pour l’enregistrement (insertion ou mise à jour).
- remove($entity) : prépare une entité pour la suppression.
- flush() : applique toutes les opérations (insert, update, delete) en attente dans la base de données.
- find($entityClass, $id) : recherche une entité par son identifiant.
- getRepository($entityClass) : récupère le repository d’une entité.
- merge($entity) : fusionne une entité détachée.
- clear() : détache toutes les entités gérées.
- detach($entity) : détache une entité spécifique.
- refresh($entity) : recharge une entité depuis la base.
- contains($entity) : vérifie si une entité est gérée.
- getReference($entityClass, $id) : obtient une référence sans charger l’entité.
- createQuery($dql) : crée une requête DQL.
- createQueryBuilder() : crée un QueryBuilder.