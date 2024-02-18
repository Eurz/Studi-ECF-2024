<?php

namespace App\Twig;

use App\Helpers\RolesHelper;
use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

class AppExtension extends AbstractExtension
{
    public function getFilters(): array
    {
        return [
            new TwigFilter('displayRole', [$this, 'displayRole']),
            new TwigFilter('getRoleName', [$this, 'getRoleName']),
            new TwigFilter('badge', [$this, 'getBadge']),

        ];
    }

    public function displayRole(array $roles): string
    {

        return $roles[0];
    }

    public function getRoleName(array $roles): string
    {

        return RolesHelper::getRoleName($this->displayRole($roles));
    }


    /**
     * 
     */
    public function getBadge(mixed $value): string
    {
        $className = '';
        $text = '';
        switch ($value) {
            case 1:
                $className = 'bg-success';
                $text = 'Medium';
                break;
            case 2:
                $className = 'bg-danger';
                $text = 'Urgent';
                break;

            default:
                $className = 'bg-secondary';
                $text = 'Low';
                break;
        }


        $badge = '<span class="badge ' . $className . '">' . $text . '</span>';

        // return $badge;
        return strip_tags($badge, ['<span>']);
    }
}
