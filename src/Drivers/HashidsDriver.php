<?php

namespace Laravel\FakeId\Drivers;

use Hashids\Hashids;
use Laravel\FakeId\Contracts\FakeDriver;

class HashidsDriver implements FakeDriver
{
    /**
     * The Hashids instance.
     *
     * @var \Hashids\Hashids
     */
    protected $hashids;

    /**
     * Create a new Hashids driver instance.
     *
     * @param  array $config
     */
    public function __construct(array $config = [])
    {
        $this->hashids = new Hashids(
            $config['salt'] ?? '',
            $config['min_length'] ?? 0,
            $config['alphabet'] ?? 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890'
        );
    }

    /**
     * Encode the data.
     *
     * @param  mixed $data
     * @return mixed
     */
    public function encode($data)
    {
        return $this->hashids->encode($data);
    }

    /**
     * Decode the data.
     *
     * @param  mixed $data
     * @return mixed
     */
    public function decode($data)
    {
        return $this->hashids->decode($data);
    }
}
