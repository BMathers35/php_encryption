<?php

    /**
     * Class php_encryption
     *
     * @author Baha Şener
     * @mail baha.sener@hotmail.com
     * @date 7 December 2022
     */

    class php_encryption{

        public array $config;

        public function __construct($config){

            if(!in_array('openssl', get_loaded_extensions())){
                $this->showError('OpenSSL extension must be installed in PHP.');
                die();
            }

            if(!is_array($config)){
                $this->showError('You must enter the configuration file as an array.');
                die();
            }

            $this->config = $config;

            if(!isset($this->config['method']) || empty($this->config['method'])){
                $this->showError('You must specify a method value with the configuration.');
                die();
            }

            if(!isset($this->config['key']) || empty($this->config['key'])){
                $this->showError('You must specify a key value with the configuration.');
                die();
            }

            if(!isset($this->config['secret']) || empty($this->config['secret'])){
                $this->showError('You must specify a secret value with the configuration.');
                die();
            }

        }

        public function Encrypt($data){

            if(isset($data)){

                $key = hash('sha256', $this->config['key']);
                $iv = substr(hash('sha256', $this->config['secret']), 0, 16);
                $encrypt = openssl_encrypt($data, $this->config['method'], $key, 0, $iv);
                return $encrypt;

            }else{
                return false;
            }

        }

        public function Decrypt($data){

            if(isset($data)){

                $key = hash('sha256', $this->config['key']);
                $iv = substr(hash('sha256', $this->config['secret']), 0, 16);
                return openssl_decrypt($data, $this->config['method'], $key, 0, $iv);

            }else{
                return false;
            }

        }

        private function showError($error){
            $this->errorTemplate($error);
        }

        private function errorTemplate($errorMsg, $title = null)
        {
            ?>
            <div class="php-encryption-error-msg-content">
                <div class="php-encryption-error-title">
                    <?= $title ? $title : __CLASS__ . ' Error:' ?>
                </div>
                <div class="php-encryption-error-msg"><?= $errorMsg ?></div>
            </div>
            <style>
                .php-encryption-error-msg-content {
                    padding: 15px;
                    border-left: 5px solid #c00000;
                    background: rgba(192, 0, 0, 0.06);
                    background: #f8f8f8;
                    margin-bottom: 10px;
                }

                .php-encryption-error-title {
                    font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
                    font-size: 16px;
                    font-weight: 500;
                }

                .php-encryption-error-msg {
                    margin-top: 15px;
                    font-size: 14px;
                    font-family: Consolas, Monaco, Menlo, Lucida Console, Liberation Mono, DejaVu Sans Mono, Bitstream Vera Sans Mono, Courier New, monospace, sans-serif;
                    color: #c00000;
                }
            </style>
            <?php
        }

    }