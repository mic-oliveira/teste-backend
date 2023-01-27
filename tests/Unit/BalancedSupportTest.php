<?php

namespace Tests\Unit;

use App\Actions\BalancedSupports;
use PHPUnit\Framework\TestCase;
use function PHPUnit\Framework\assertEquals;

class BalancedSupportTest extends TestCase
{
    /**
     * @return void
     * @dataProvider validSupports
     */
    public function test_is_balanced_support($support): void
    {
        $result = BalancedSupports::run($support);
        assertEquals('Válido',$result);
    }

    public function validSupports(): array
    {
        return [
            ['(){}[]'],
            ['[{()}](){}'],
            ['[(jhda76vda)]{kjda124331}[{khda}hdkakjds(562)]'],
        ];
    }

    /**
     * @param $support
     * @return void
     * @dataProvider invalidSupports
     */
    public function test_is_not_balanced($support): void
    {
        $result = BalancedSupports::run($support);
        assertEquals('Inválido',$result);
    }

    public function invalidSupports(): array
    {
        return [
            ['[]{()'],
            ['[{)]'],
        ];
    }

}
