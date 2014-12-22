<?php
namespace Network\Profiles;

use Network\Presenters\PresentableTrait;

class Profile extends \Phalcon\Mvc\Model
{
    use PresentableTrait;

    protected $_presenter = '\Network\Presenters\ProfilePresenter';


    /**
     *
     * @var integer
     */
    protected $id;
     
    /**
     *
     * @var string
     */
    protected $avatar;
     
    /**
     *
     * @var integer
     */
    protected $userId;
     
    /**
     *
     * @var string
     */
    protected $createdAt;
     
    /**
     *
     * @var string
     */
    protected $updatedAt;
     
    /**
     * Method to set the value of field id
     *
     * @param integer $id
     * @return $this
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Method to set the value of field avatar
     *
     * @param string $avatar
     * @return $this
     */
    public function setAvatar($avatar)
    {
        $this->avatar = $avatar;

        return $this;
    }

    /**
     * Method to set the value of field user_id
     *
     * @param integer $user_id
     * @return $this
     */
    public function setUserId($user_id)
    {
        $this->userId = $user_id;

        return $this;
    }

    /**
     * Method to set the value of field created_at
     *
     * @param string $created_at
     * @return $this
     */
    public function setCreatedAt($created_at)
    {
        $this->createdAt = $created_at;

        return $this;
    }

    /**
     * Method to set the value of field updated_at
     *
     * @param string $updated_at
     * @return $this
     */
    public function setUpdatedAt($updated_at)
    {
        $this->updatedAt = $updated_at;

        return $this;
    }

    /**
     * Returns the value of field id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Returns the value of field avatar
     *
     * @return string
     */
    public function getAvatar()
    {
        return $this->avatar;
    }

    /**
     * Returns the value of field user_id
     *
     * @return integer
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * Returns the value of field created_at
     *
     * @return string
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Returns the value of field updated_at
     *
     * @return string
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
		$this->setSource('Profiles');
        $this->belongsTo('userId', '\Network\Users\User', 'id', [
            'alias' => 'user'
        ]);
    }

    /**
     * Independent Column Mapping.
     */
    public function columnMap()
    {
        return array(
            'id' => 'id', 
            'avatar' => 'avatar', 
            'user_id' => 'userId', 
            'created_at' => 'createdAt', 
            'updated_at' => 'updatedAt'
        );
    }

}
