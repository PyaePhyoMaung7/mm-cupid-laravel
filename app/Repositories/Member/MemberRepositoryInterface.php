<?php

namespace App\Repositories\Member;

interface MemberRepositoryInterface
{
    public function getMembers();

    public function getMemberByEmail(string $email);

    public function emailAlreadyExists(array $data);

    public function register(array $data);

    public function sendEmailConfirmMail($data);

    public function confirmEmail(array $data);

    public function getMemberPointById(int $id);

    public function apiSyncMembers(array $data);

    public function sendPasswordResetLink(array $data);
}
