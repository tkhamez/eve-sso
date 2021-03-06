<?php

declare(strict_types=1);

namespace Eve\Sso;

use League\OAuth2\Client\Token\AccessTokenInterface;

class EveAuthentication implements \JsonSerializable
{
    /**
     * @var int
     */
    private $characterId;

    /**
     * @var string
     */
    private $characterName;

    /**
     * @var string
     */
    private $characterOwnerHash;

    /**
     * @var string[]
     */
    private $scopes;

    /**
     * @var AccessTokenInterface
     */
    private $token;

    /**
     * @param int $characterId
     * @param string $characterName
     * @param string $characterOwnerHash
     * @param AccessTokenInterface $token
     * @param string[] $scopes
     */
    public function __construct(
        int $characterId,
        string $characterName,
        string $characterOwnerHash,
        AccessTokenInterface $token,
        array $scopes = []
    ) {
        $this->characterId = $characterId;
        $this->characterName = $characterName;
        $this->characterOwnerHash = $characterOwnerHash;
        $this->token = $token;
        $this->scopes = $scopes;
    }

    public function getCharacterId(): int
    {
        return $this->characterId;
    }

    public function getCharacterName(): string
    {
        return $this->characterName;
    }

    public function getCharacterOwnerHash(): string
    {
        return $this->characterOwnerHash;
    }

    public function getToken(): AccessTokenInterface
    {
        return $this->token;
    }

    /**
     * @return string[]
     */
    public function getScopes(): array
    {
        return $this->scopes;
    }

    /**
     * Contains core data for serialisation
     */
    public function jsonSerialize(): array
    {
        return [
            'characterId' => $this->characterId,
            'character_name' => $this->characterName,
            'token' => $this->token
        ];
    }
}
