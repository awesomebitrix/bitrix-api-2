<?php
/**
 * Created by PhpStorm.
 * User: sgavka
 * Date: 27.01.17
 * Time: 16:50
 */

namespace AlterEgo\BitrixAPI\classes\models\entity;

class EntityItemProperty
{
    const TYPE_STRING = 'S';

    const TYPE_NUMBER = 'N';

    const TYPE_FILE = 'F';

    /**
     * @var string Entity ID
     */
    private $entity;

    /**
     * @var string
     */
    private $property;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $type;

    /**
     * @param array $array
     *
     * @return EntityItemProperty
     */
    public static function CreateFromArray($array)
    { // todo: create automatical method for filling object from bitrix array
        $invoice = new EntityItemProperty();

        if (array_key_exists('ENTITY', $array)) {
            $invoice->setEntity($array['ENTITY']);
        }

        $invoice->setProperty($array['PROPERTY']);
        $invoice->setName($array['NAME']);
        $invoice->setType($array['TYPE']);

        return $invoice;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        $array = array();

        if (!is_null($this->getEntity())) {
            $array['ENTITY'] = $this->getEntity();
        }

        $array['PROPERTY'] = $this->getProperty();
        $array['NAME'] = $this->getName();
        $array['TYPE'] = $this->getType();

        return $array;
    }

    /**
     * @param string $entity
     * @return EntityItemProperty
     */
    public function setEntity($entity)
    {
        $this->entity = $entity;
        return $this;
    }

    /**
     * @return string
     */
    public function getEntity()
    {
        return $this->entity;
    }

    /**
     * @param string $name
     * @return EntityItemProperty
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $type
     * @return EntityItemProperty
     */
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $property
     * @return EntityItemProperty
     */
    public function setProperty($property)
    {
        $this->property = $property;
        return $this;
    }

    /**
     * @return string
     */
    public function getProperty()
    {
        return $this->property;
    }
}
