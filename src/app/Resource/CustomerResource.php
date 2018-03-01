<?php

namespace App\Resource;

use App\AbstractResource;
use App\Entities\Customer;

/**
 * Class Resource
 * @package App
 */
class CustomerResource extends AbstractResource
{

    /**
     * @param $id
     *
     * @return string
     */
    public function get($id)
    {
        if ($id === null) {
            $customers = $this->getEntityManager()->getRepository('App\Entities\Customer')->findAll();
            $customers = array_map(function($customer) {
                return $this->convertToArray($customer); },
                $customers);
            $data = json_encode($customers);
        } else {
            $data = $this->convertToArray($this->getEntityManager()->find('App\Entities\Customer', $id));
        }

        // @TODO handle correct status when no data is found...

        return json_encode($data);
    }

    // POST, PUT, DELETE methods...

    private function convertToArray(Customer $customer) {
        return array(
            'id' => $customer->getId(),
            'name' => $customer->getName(),
            'cart' => $customer->getCart()->getCartItems()->get(0)->getProduct()->getName()
        );
    }
}