<?php

namespace App\Actions;

use Lorisleiva\Actions\Concerns\AsAction;

class BalancedSupports
{
    use AsAction;

    public function handle(string $value): bool
    {
        $value = preg_replace('/([\w\d])/','', $value);
        $supportStack = str_split($value);
        return $this->balancesSupport($supportStack) ? 'Válido' : 'Inválido';
    }

    private function balancesSupport(array &$stack): bool
    {
        $count = count($stack);
        if ($count % 2 != 0) {
            return false;
        }
        while($count > 0) {
            $stack = $this->balancedRemove($stack);
            $count -= 1;
        }
        return empty($stack);

    }

    private function balancedRemove(array &$stack, $index = 0): array
    {
        foreach ($stack as $index => $value){
            $nextIndex = $index + 1;
            if ($value == '[' && $stack[$nextIndex] == ']') {
                unset($stack[$index], $stack[$nextIndex]);
            }
            if ($value == '{' && $stack[$nextIndex] == '}') {
                unset($stack[$index], $stack[$nextIndex]);
            }
            if ($value == '(' && $stack[$nextIndex] == ')') {
                unset($stack[$index], $stack[$nextIndex]);
            }
        }
        $stack = array_values($stack);
        return $stack;

    }
}
