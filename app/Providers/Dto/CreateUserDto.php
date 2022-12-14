<?php

namespace App\Providers\Dto;
use Validator;
use Illuminate\Support\Str;

class CreateUserDto extends AbstractDto implements DtoInterface
{
    public $name;
    public $email;
    public $password;

    /* @return array */
    protected function configureValidatorRules(): array
    {
        return [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ];
    }

    /**
     * @inheritDoc
     */
    protected function map(array $data): bool
    {
      try{
        $this->name  = $data['name'];
        $this->email = $data['email'];
        $this->password = $data['password'];
        $this->active = true;
        $this->token = Str::random(60);

        return true;
      } catch(Exception $e){
        return false;
      }

    }
}