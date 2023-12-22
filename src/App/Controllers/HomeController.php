<?php

declare(strict_types= 1);

namespace App\Controllers;

use Framework\TemplateEngine;
use App\Config\Paths;
use App\Services\TransactionService;

class HomeController{
    public function __construct (
        private TemplateEngine $view,
        private TransactionService $transaction
        ){
    }

    public function home () {
        $page = $_GET['p'] ?? 1;
        $page = (int) $page;
        $length = 3;
        $offset = ($page - 1) * $length;
        $searchTerm = $_GET['s'] ?? null;
        [$transactions, $count] = $this->transaction->getAllTransactions($length, $offset);
        $lastPage = ceil($count / $length);
        $pages = $lastPage ? range(1, $lastPage) : [];

        $pageLinks = array_map(
        fn ($pageNum) => http_build_query([
            'p' => $pageNum,
            's' => $searchTerm
        ]),
        $pages
        );
        echo $this->view->render('/index.php', [
            "transactions" => $transactions,
            "currentPage" => $page,
            "previousPageQuery" => http_build_query([
                'p' => $page -1
            ]),
            "lastPage" => $lastPage,
            "nextPage" => http_build_query([
                "s" => $searchTerm,
                "p" => $page + 1
            ]),
            'pageLinks' => $pageLinks,
            'searchTerm' => $searchTerm
          ]);
        }
}
            
        
