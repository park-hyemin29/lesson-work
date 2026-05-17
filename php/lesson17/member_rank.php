<?php

$profileList = [
    ['name' => "Taro", 'point' => 1200],
    ['name' => "Hanako", 'point' => 780],
    ['name' => "Ken", 'point' => 300],
];

class Member
{
    private const GOLD_RANK_THRESHOLD = 1000;
    private const SILVER_RANK_THRESHOLD = 500;

    public function rank(array $profile): string
    {
        if ($profile['point'] >= self::GOLD_RANK_THRESHOLD) {
            return 'Gold';
        }

        if ($profile['point'] >= self::SILVER_RANK_THRESHOLD) {
            return 'Silver';
        }

        return 'Bronze';
    }

    public function buildRankList(array $profileList): string
    {
        $list = '';

        foreach ($profileList as $profile) {
            $name = $profile['name'];
            $rank = $this->rank($profile);

            $list .= "{$name}: {$rank}\n";
        }

        return $list;
    }
}

$member = new Member();

echo $member->buildRankList($profileList);