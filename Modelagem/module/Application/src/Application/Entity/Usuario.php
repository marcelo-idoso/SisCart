<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;
use Zend\Crypt\Password\BcryptSha;
use Zend\Math\Rand;

/**
 * Usuario
 *
 * @ORM\Table(name="usuario", uniqueConstraints={@ORM\UniqueConstraint(name="idUsuario_UNIQUE", columns={"idUsuario"}), @ORM\UniqueConstraint(name="email_UNIQUE", columns={"email"})})
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="Application\Entity\UsuarioRepository")
 */
class Usuario
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idUsuario", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idusuario;

    /**
     * @var string
     *
     * @ORM\Column(name="nome", type="string", length=100, nullable=false)
     */
    private $nome;

    /**
     * @var string
     *
     * @ORM\Column(name="senha", type="string", length=255, nullable=false)
     */
    private $senha;

    /**
     * @var string
     *
     * @ORM\Column(name="salt", type="string", length=255, nullable=false)
     */
    private $salt;
    public function __construct() {
        $this->setSalt(Rand::getString(250, $this->nome , TRUE));
    }




    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=100, nullable=false)
     */
    private $email;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dtaInc", type="datetime", nullable=false)
     */
    private $dtainc = 'CURRENT_TIMESTAMP';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dtaValSenha", type="date", nullable=false)
     */
    private $dtavalsenha;

    /**
     * @var integer
     *
     * @ORM\Column(name="status", type="integer", nullable=false)
     */
    private $status;



    /**
     * Get idusuario
     *
     * @return integer
     */
    public function getIdusuario()
    {
        return $this->idusuario;
    }

    /**
     * Set nome
     *
     * @param string $nome
     *
     * @return Usuario
     */
    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * Get nome
     *
     * @return string
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * Set senha
     *
     * @param string $senha
     *
     * @return Usuario
     */
    public function setSenha($senha)
    {
        $this->senha = $this->encryptSenha($senha);

        return $this;
    }

    /**
     * Get senha
     *
     * @return string
     */
    public function getSenha()
    {
        return $this->senha;
    }

    /**
     * Set salt
     *
     * @param string $salt
     *
     * @return Usuario
     */
    public function setSalt($salt)
    {
        $this->salt = $salt;

        return $this;
    }

    /**
     * Get salt
     *
     * @return string
     */
    public function getSalt()
    {
        return $this->salt;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Usuario
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set dtainc
     *
     * @param \DateTime $dtainc
     *
     * @return Usuario
     */
    public function setDtainc($dtainc)
    {
        $this->dtainc = $dtainc;

        return $this;
    }

    /**
     * Get dtainc
     *
     * @return \DateTime
     */
    public function getDtainc()
    {
        return $this->dtainc;
    }

    /**
     * Set dtavalsenha
     *
     * @param \DateTime $dtavalsenha
     *
     * @return Usuario
     */
    public function setDtavalsenha($dtavalsenha)
    {
        $this->dtavalsenha = $dtavalsenha;

        return $this;
    }

    /**
     * Get dtavalsenha
     *
     * @return \DateTime
     */
    public function getDtavalsenha()
    {
        return $this->dtavalsenha;
    }

    /**
     * Set status
     *
     * @param integer $status
     *
     * @return Usuario
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return integer
     */
    public function getStatus()
    {
        return $this->status;
    }
    
    /**
     * encryptSenha
     *
     * @return strung
     */
    public function encryptSenha($senha) {
        $bcrypt = new BcryptSha();
        $bcrypt->setSalt($this->salt);
        return $bcrypt->create($senha);
    }
}
