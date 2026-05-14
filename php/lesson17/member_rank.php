<?php

$profile_list = [
    ['name' => "Taro", 'point' => 1200],
    ['name' => "Hanako", 'point' => 780],
    ['name' => "Ken", 'point' => 300],
];

class Member {
    public function rank(array $profile) : string {
        if ($profile['point'] >= 1000) {
            return 'Gold';
        }
        if ($profile['point'] >= 500) {
            return 'Silver';
        }
        return 'Bronze';
    }

    public function profile(array $profile_list) : string {
        $list;

        foreach ($profile_list as $row) {
            $name = $row['name'];
            $rank = $this->rank($row);
            $list= "{$name}: {$rank}\n";
        }

        return $list;
    }
}

$member = new Member();

for ($i = 0; $i < count($profile_list); $i++) {
    $row = $profile_list[$i];
    echo "{$row['name']}: {$member->rank($row)}\n";
}