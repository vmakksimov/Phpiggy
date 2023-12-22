<?php

declare(strict_types=1);

namespace App\Controllers;

use Framework\TemplateEngine;
use App\Services\{ValidatorService, TransactionService};

class TransactionController
{
  public function __construct(
    private TemplateEngine $view,
    private ValidatorService $validator,
    private TransactionService $transaction
  ) {
  }

  public function createView()
  {
    echo $this->view->render("transactions/create.php");
  }

  public function validateTransaction(){
    $this->validator->validateTransaction($_POST);
    $this->transaction->create($_POST);
    redirectTo("/");
  }

  public function editView(){
    
  }
}