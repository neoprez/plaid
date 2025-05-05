<?php

namespace Abivia\Plaid\Api;

use Illuminate\Support\Carbon;
use Abivia\Plaid\PlaidRequestException;

class Transactions extends AbstractResource
{
    /**
     * The /transactions/sync endpoint retrieves 
     * transactions associated with an Item and 
     * can fetch updates using a cursor to track 
     * which updates have already been seen.
     *
     * @param string $accessToken
     * @param string|null $cursor
     * @param int $count
     * @param array<string,mixed> $options
     * @return Transactions
     * @throws PlaidRequestException
     */
    public function sync(
        string $accessToken,
        ?string $cursor = null,
        int $count = 100,
        array $options = []
    ): self {
        $this->sendRequest(
            'transactions/sync',
            [
                'access_token' => $accessToken,
                'cursor' => $cursor,
                'count' => $count,
                'options' => (object)$options
            ]
        );

        return $this;
    }

    /**
     * Get all transactions for a particular Account.
     *
     * @param string $accessToken
     * @param Carbon $startDate
     * @param Carbon $endDate
     * @param array<string,mixed> $options
     * @return Transactions
     * @throws PlaidRequestException
     */
    public function list(
        string $accessToken,
        Carbon $startDate,
        Carbon $endDate,
        array $options = []
    ): self {
        $this->sendRequest(
            'transactions/get',
            [
                'access_token' => $accessToken,
                'start_date' => $startDate->format('Y-m-d'),
                'end_date' => $endDate->format('Y-m-d'),
                'options' => (object)$options
            ]
        );

        return $this;
    }

    /**
     * Refresh transactions for a particular Account.
     *
     * @param string $accessToken
     * @return Transactions
     * @throws PlaidRequestException
     */
    public function refresh(string $accessToken): self
    {
        $this->sendRequest('transactions/refresh', ['access_token' => $accessToken]);

        return $this;
    }
}
