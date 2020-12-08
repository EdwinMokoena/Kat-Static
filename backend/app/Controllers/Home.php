<?php namespace App\Controllers;

use CodeIgniter\API\ResponseTrait;

class Home extends BaseController
{
    use ResponseTrait;

    public function index()
    {
        helper('url');
        return view('index');
    }

    public function services()
    {
        return view("service");
    }

    public function about()
    {
        return view("about");
    }

    public function esg()
    {
        return view("esg");
    }

    public function contact()
    {
        /* if */
        return view("contact");
    }

    public function contact_form()
    {
        $mailer = \Config\Services::email();
        $validator = \Config\Services::validation();
        $data = [
          "name" => $this->request->getVar("name"),
          "surname" => $this->request->getVar("surname"),
          "email" => $this->request->getVar("email")
        ];
        $validator->reset();
        if($validator->run($data, "contact_form")) {
            $mailer->setFrom("sitemail@simsconsultancy.co.za", "Sims Consultancy");
            $mailer->setTo("info@simsconsultancy.co.za");
            $mailer->setSubject("Communication request");
            $mailer->setMessage("Message from ".$data["name"] ." ". $data["surname"] ." email address " .$data["email"]);
            $email_sent = $mailer->send();

            if ($email_sent) {
                return $this->setResponseFormat('json')->respond(
                    [
                      "message"     => "success",
                      "status"      => 200
                    ]
                );
            } else {
                return $this->setResponseFormat('json')->respond(
                    [
                    "statusCode"  => 500,
                    "message"     => "Message couldn't send, please try again later",
                    ]
                );
            }
        } else {
            return $this->setResponseFormat('json')->fail(
                [
                "status"  => 400,
                "messages"     => $validator->getErrors(),
                ]
            );
        }
    }
}
