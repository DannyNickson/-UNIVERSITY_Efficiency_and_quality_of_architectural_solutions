<?php

abstract class RestApiTemplate {
    protected $data;
    protected $status;
    protected $message;
    protected $response;
    protected $validated;
    
    public function update($id, $feildsToChange) {
        $this->data = $this->getData($id);
        if(!$this->validate($feildsToChange)){
            $this->notifyAdmin();
        }
        $this->hook1();
        $this->response();
    }
    
    protected function getData($id) {
        return $this->data
    }
    
    abstract protected function validate() {}
    
    abstract protected function notifyAdmin() {}
    
    protected function response() {
        $response = array(
            'status' => $this->status,
            'message' => $this->message,
        );
        return $this->appendData($response);
    }
    
    protected function appendData($response) {
        return $response;
    }

    protected function hook1(){}
}

class ProductRestApi extends RestApiTemplate {
    protected function notifyAdmin() {
        //notify admin via messenger
    }
}

class UserRestApi extends RestApiTemplate {
    protected function validate() {
        if($this->data !== $feildsToChange['email']){
            return false
        }
    }
}

class AdminRestApi extends RestApiTemplate {

    protected function response() {
        $response = array(
            'status' => $this->status,
            'message' => $this->message,
            'json' => $this->data.toJSON();
        );
        return $this->appendData($response);
    }

}