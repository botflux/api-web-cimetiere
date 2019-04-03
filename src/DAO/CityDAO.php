<?php

namespace App\DAO;

use \PDO;
use \App\Entity\City;
use \DateTime;
use \Date;

class CityDAO extends DAO 
{
    public const TABLE_NAME = 'commune';

    public function __construct(PDO $connection)
    {
        parent::__construct($connection);
    }

    public function findAll () : array
    {
        $statement = $this->getConnection()->prepare("SELECT * FROM commune");
        
        if ($statement->execute()) {
            $citiesRows = $statement->fetchAll(PDO::FETCH_ASSOC);
            $citiesEntities = [];

            foreach ($citiesRows as $v) {
                $citiesEntities[] = $this->resolveRow($v);
            }

            return $citiesEntities;
        } else {
            throw new \Exception('Something went wrong when executing findAll() in CityDAO');
        }
    }

    protected function resolveRow(array $row) : City
    {
        $city = (new City())
            ->setId($row['id'])
            ->setName($row['nom'])
            ->setCounty($row['departement'])
            ->setAddress($row['adresse'])
            ->setPhone($row['telephone'])
            ->setEmail($row['email'])
            ->setPassword($row['password'])
            ->setConcessions($row['concessions'])
            ->setCreatedAt(new DateTime($row['creation']))
            ->setModifiedAt(new DateTime($row['modification']))
            ->setConnectedAt(new DateTime($row['connexion']))
            ->setHidden($row['hidden'])
            ->setCanBloom($row['interne_fleurir'])
            ->setCanMaintain($row['interne_entretenir'])
            ->setHideEndClaim($row['hide_fin_droit'])
            ->setZipCode($row['code_postal'])
        ;

        return $city;
    }
}