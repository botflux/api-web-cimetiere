<?php

namespace App\DAO;

use \PDO;
use \App\Entity\City;
use \DateTime;
use \Date;

class CityDAO extends DAO 
{
    public const TABLE_NAME = 'commune';
    private const VALID_PARAMS = [
        'name' => 'nom',
        'county' => 'departement'
    ];

    public function __construct(PDO $connection)
    {
        parent::__construct($connection);
    }

    /**
     * Get columns count
     *
     * @param array $whereOptions
     * @return 
     */
    public function getCount (array $whereOptions)
    {
        $request = 'SELECT COUNT(commune.id) as communeCount FROM commune';
        $where = '';
        foreach ($whereOptions as $optionsName => $v) {
            if (!isset(self::VALID_PARAMS[$optionsName])) 
                continue;

            $where .= empty($where) ? 'WHERE ' : ' AND ';
            $where .= \sprintf('%s LIKE :%s', self::VALID_PARAMS[$optionsName], $optionsName); 
        }

        $request .= " $where";

        $statement = $this->getConnection()->prepare($request);
        foreach ($whereOptions as $optionName => $v) {
            if (!isset(self::VALID_PARAMS[$optionName]))
                continue;
            $statement->bindParam(":$optionName", $v);
        }

        if ($statement->execute()) {
            $result = $statement->fetch(\PDO::FETCH_ASSOC);
            return intval($result['communeCount']);
        } else {
            throw new \Exception('Something went wrong when executing getCount.');
        }

    }

    public function findAll (array $whereOptions = [], $first = 0, $count = 25) : array
    {
        $request = 'SELECT * FROM commune';


        $where = '';
        foreach ($whereOptions as $optionName => $v) {
            if (!isset(self::VALID_PARAMS[$optionName]))
                continue;
            
            $where .= empty($where) ? 'WHERE ' : ' AND ';
            $where .= sprintf('%s LIKE :%s', self::VALID_PARAMS[$optionName], $optionName);
        }

        $request .= " $where";

        if (!\is_integer($first) || \intval($first) < 0) $first = 0;
        if (!\is_integer($count) || \intval($count) < 1) $count = 1;

        $request .= ' LIMIT :first,:count';

        $statement = $this->getConnection()->prepare($request);
        
        $statement->bindParam('first', $first, PDO::PARAM_INT);
        $statement->bindParam('count', $count, PDO::PARAM_INT);
        
        foreach ($whereOptions as $optionName => $v) {
            if (!isset(self::VALID_PARAMS[$optionName]))
                continue;
            $statement->bindParam(":$optionName", $v);
        }

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