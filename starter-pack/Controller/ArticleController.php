<?php

declare(strict_types = 1);

class ArticleController
{
    private DatabaseManager $databaseManager;
    //connecting to database in this class

    public function __construct(DatabaseManager $databaseManager)
    {
        $this->databaseManager = $databaseManager;
    }


    public function index()
    {
        // Load all required data
        $articles = $this->getArticles();

        // Load the view
        require 'View/articles/index.php';
    }

    // Note: this function can also be used in a repository - the choice is yours
    private function getArticles(): array
    {
        // TODO: prepare the database connection
        // Note: you might want to use a re-usable databaseManager class - the choice is yours

      

        // TODO: fetch all articles as $rawArticles (as a simple array)
        $rawArticles = [];
        $query = "SELECT * from articles";
        $rawArticles = $this->databaseManager->connection
        ->query($query)
        ->fetchAll();

        //fetchAll seems to convert things into a string -> leading to an error message

       

        $articles = [];
        foreach ($rawArticles as $rawArticle) {
            // We are converting an article from a "dumb" array to a much more flexible class
            $articles[] = new Article($rawArticle['id'], $rawArticle['title'], $rawArticle['description'], $rawArticle['publishDate']);
        }

        return $articles;
    }

    public function show()
    {
        $query = "SELECT * FROM `articles` WHERE id={$_GET['id']}";
        $rawArticle = $this->databasemanager->connection->query($query, PDO::FETCH_ASSOC)->fetch();
        $article = new Article($rawArticle['title'], $rawArticle['description'], $rawArticle['date'], $rawArticle['id']);
        require 'View/articles/show.php';
        // TODO: this can be used for a detail page
    }
    /* private function getArticle(): array
    {
        $id = $_GET['id'] ?? null;

        if (!$id){
            header('Location: index.php');
            exit;
        }
        $query = 'SELECT * FROM articles WHERE id = :id';
		$result = $this->databaseManager->connection->prepare($query);
		$result->bindValue(':id', $id);
		$result->execute();
		$rawArticle = $result->fetch(PDO::FETCH_ASSOC);

        $article = [];
		$article[] = new Article($rawArticle['id'], $rawArticle['title'], $rawArticle['description'],
			$rawArticle['publishDate']);

		return $article;
    } */
}
