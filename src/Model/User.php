<?php

namespace Mineur\InstagramParser\Model;


class User
{
    /** @var string */
    private $id;
    
    /** @var string */
    private $username;
    
    /** @var null|string */
    private $fullName;
    
    /** @var null|string */
    private $biography;
    
    /** @var int */
    private $follows;
    
    /** @var int */
    private $followedBy;
    
    /** @var null|string */
    private $externalUrl;
    
    /** @var bool */
    private $countryBlock;
    
    /** @var bool */
    private $isPrivate;
    
    /** @var bool */
    private $isVerified;
    
    /** @var string */
    private $profilePictureUrl;
    
    /** @var string */
    private $profilePictureUrlHd;
    
    /** @var null|string */
    private $connectedFacebookPage;
    
    /** @var array */
    private $media;
    
    private function __construct(
        string $id,
        string $username,
        ? string $fullName,
        ? string $biography,
        int $follows,
        int $followedBy,
        ? string $externalUrl,
        bool $countryBlock,
        bool $isPrivate,
        bool $isVerified,
        string $profilePictureUrl,
        string $profilePictureUrlHd,
        ? string $connectedFacebookPage,
        array $media
    )
    {
        $this->id                    = $id;
        $this->username              = $username;
        $this->fullName              = $fullName;
        $this->biography             = $biography;
        $this->follows               = $follows;
        $this->followedBy            = $followedBy;
        $this->externalUrl           = $externalUrl;
        $this->countryBlock          = $countryBlock;
        $this->isPrivate             = $isPrivate;
        $this->isVerified            = $isVerified;
        $this->profilePictureUrl     = $profilePictureUrl;
        $this->profilePictureUrlHd   = $profilePictureUrlHd;
        $this->connectedFacebookPage = $connectedFacebookPage;
        $this->media                 = $media;
    }
    
    public static function fromArray(array $user)
    {
        return new self(
            $user['id'],
            $user['username'],
            $user['full_name'],
            $user['biography'],
            $user['follows']['count'],
            $user['followed_by']['count'],
            $user['external_url'],
            $user['country_block'],
            $user['is_private'],
            $user['is_verified'],
            $user['profile_pic_url'],
            $user['profile_pic_url_hd'],
            $user['connected_fb_page'],
            $user['media']['nodes']
        );
    }
    
    /** @return string */
    public function getId(): string
    {
        return $this->id;
    }
    
    /** @return string */
    public function getUsername(): string
    {
        return $this->username;
    }
    
    /** @return null|string */
    public function getFullName()
    {
        return $this->fullName;
    }
    
    /** @return null|string */
    public function getBiography()
    {
        return $this->biography;
    }
    
    /** @return int */
    public function getFollows(): int
    {
        return $this->follows;
    }
    
    /** @return int */
    public function getFollowedBy(): int
    {
        return $this->followedBy;
    }
    
    /** @return null|string */
    public function getExternalUrl()
    {
        return $this->externalUrl;
    }
    
    /** @return bool */
    public function isCountryBlock(): bool
    {
        return $this->countryBlock;
    }
    
    /** @return bool */
    public function isPrivate(): bool
    {
        return $this->isPrivate;
    }
    
    /** @return bool */
    public function isVerified(): bool
    {
        return $this->isVerified;
    }
    
    /** @return string */
    public function getProfilePictureUrl(): string
    {
        return $this->profilePictureUrl;
    }
    
    /** @return string */
    public function getProfilePictureUrlHd(): string
    {
        return $this->profilePictureUrlHd;
    }
    
    /** @return null|string */
    public function getConnectedFacebookPage()
    {
        return $this->connectedFacebookPage;
    }
    
    /** @return array */
    public function getMedia(): array
    {
        return $this->media;
    }
}