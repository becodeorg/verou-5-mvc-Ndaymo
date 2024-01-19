<?php

declare(strict_types=1);

class ArticleController
{
    private DatabaseManager $databaseManager;

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
    private function getArticles()
    {
        // TODO: prepare the database connection
        // Note: you might want to use a re-usable databaseManager class - the choice is yours
        // TODO: fetch all articles as $rawArticles (as a simple array)

        try {
            $query = "SELECT * FROM articles";
            $statement = $this->databaseManager->connection->query($query);
            $rawData = $statement->fetchAll(); // Fetches as array

            foreach ($rawData as $rawArticle) {
                $articles[] = new Article($rawArticle["title"], $rawArticle["description"], $rawArticle["publish_date"]); // Change to objects
            }

            require "view/home.php"; // load view

        } catch (PDOException $err) {
            throw new RuntimeException($err);
        }

        $rawArticles = [];

        $articles = [];
        foreach ($rawArticles as $rawArticle) {
            // We are converting an article from a "dumb" array to a much more flexible class
            $articles[] = new Article($rawArticle['title'], $rawArticle['description'], $rawArticle['publish_date']);
        }

        return $articles;
    }

    public function show()
    {
        // TODO: this can be used for a detail page
    }
}


// class IdeaController
// {


//     public function get(): void
//     {
//         try {
//             $query = "SELECT * FROM ideas";
//             $statement = $this->databaseManager->connection->query($query);
//             $rawData = $statement->fetchAll(); // Fetches as array

//             foreach ($rawData as $rawIdea) {
//                 $ideas[] = new Idea($rawIdea["id"], $rawIdea["title"]); // Change to objects
//             }

//             require "Views/overview.php"; // load view

//         } catch (PDOException $err) {
//             throw new RuntimeException($err);
//         }
//     }

// }