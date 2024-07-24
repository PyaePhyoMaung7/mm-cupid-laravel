<?php

namespace App\Repositories\Member;

interface MemberRepositoryInterface
{
    public function getMembers(string $key);

    public function changeStatus(int $id, int $status);

    public function updatePoint(array $data);

    public function getMemberByEmail(string $email);

    public function emailAlreadyExists(array $data);

    public function register(array $data);

    public function memberUpdate(array $data);

    public function apiMemberPhotoUpdate(array $data);

    public function apiMemberPhotoDelete(array $data);

    public function apiStoreVerificationPhoto(array $data);

    public function sendEmailConfirmMail($data);

    public function confirmEmail(array $data);

    public function getMemberById(int $id);

    public function getMemberPointById(int $id);

    public function apiSyncMembers(array $data);

    public function apiMemberViewUpdate(int $id);

    public function sendPasswordResetLink(array $data);

    public function getMemberIdByPasswordResetCode(string $code);

    public function updatePassword(array $data);

    public function apiSendDateRequest(int $id);

    public function apiDateRequestStatusUpdate(array $data);

}
