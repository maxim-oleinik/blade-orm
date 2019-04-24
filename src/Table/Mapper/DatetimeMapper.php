<?php namespace Blade\Orm\Table\Mapper;

use Blade\Orm\Value\DateTime;
use Blade\Orm\Value\DateTimeNull;


/**
 * @see \Blade\Orm\Test\Table\Mapper\DatetimeMapperTest
 */
class DatetimeMapper implements MapperInterface
{
    /**
     * @param  mixed $value
     * @return null|string
     */
    public function toDb($value)
    {
        if (!$value) {
            return null;

        } elseif (!$value instanceof \DateTime) {
            throw new \InvalidArgumentException(get_class($this) . '::' . __FUNCTION__ . ": Expected DateTime");

        } else {
            return $value->format('Y-m-d H:i:s');
        }
    }

    /**
     * @param  string $value
     * @return DateTime|DateTimeNull
     */
    public function fromDb(&$value)
    {
        if (null === $value) {
            return new DateTimeNull;

        } else {
            return new DateTime($value);
        }
    }

}
