<?php

declare(strict_types = 1);

class ArticleController
{
    //connecting to database in this class
    private DatabaseManager $databasemanager;

    public function __construct(DatabaseManager $databaseManager)
    {
        $this->databasemanager = $databaseManager;
    }


    public function index()
    {
        // Load all required data
        $articles = $this->getArticles();

        // Load the view
        require 'View/articles/index.php';
    }

    // Note: this function can also be used in a repository - the choice is yours
    private function getArticles()
    {
        // TODO: prepare the database connection
        // Note: you might want to use a re-usable databaseManager class - the choice is yours

      

        // TODO: fetch all articles as $rawArticles (as a simple array)
        $query = "SELECT * from `articles`";
        $result = $this->databaseManager->connection->query($query);
        $result->execute();
        $resultFetch = $result->fetchAll(PDO::FETCH_ASSOC);
        $rawArticles = $resultFetch;

       

        $articles = [];
        foreach ($rawArticles as $rawArticle) {
            // We are converting an article from a "dumb" array to a much more flexible class
            $articles[] = new Article($rawArticle['id'], $rawArticle['title'], $rawArticle['description'], $rawArticle['publishDate']);
        }

        var_dump($rawArticles);

        return $articles;
    }

    public function show()
    {
        $articles = $this->getArticles();
        require 'View/articles/show.php';
        // TODO: this can be used for a detail page
    }
}
