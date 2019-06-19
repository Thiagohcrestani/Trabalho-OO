<?php

namespace Config\Post;

use Factories\SqlitePostProviderFactory;

class ProviderFactoryConfig {
    /**
     * @return Factories\AbstractFactoryPostProvider
     */
    public static function getPostProviderFactory(){
        return new SqlitePostProviderFactory();
    }

}