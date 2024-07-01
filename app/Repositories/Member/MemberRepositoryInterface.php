<?php

namespace App\Repositories\Member;

interface MemberRepositoryInterface
{
    public function getMembers();

    public function emailAlreadyExists(array $data);

    public function register(array $data);

    public function sendEmailConfirmMail($data);

    public function confirmEmail(string $email_confirm_code);
}
