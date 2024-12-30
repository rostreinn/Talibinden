<?php

namespace App\Libraries;

use Config\MongoDB;
use MongoDB\BSON\ObjectId;

class RoleModel
{
    protected $collection;

    public function __construct()
    {
        $mongo = new MongoDB();
        $this->collection = $mongo->getCollection('role');
    }

    public function getAll()
    {
        return $this->collection->find()->toArray();
    }

    public function getById($id)
    {
        return $this->collection->findOne(['_id' => new ObjectId($id)]);
    }

    public function create($data)
    {
        return $this->collection->insertOne($data);
    }

    public function update($id, $data)
    {
        return $this->collection->updateOne(
            ['_id' => new ObjectId($id)],
            ['$set' => $data]
        );
    }

    public function delete($id)
    {
        return $this->collection->deleteOne(['_id' => new ObjectId($id)]);
    }
}
