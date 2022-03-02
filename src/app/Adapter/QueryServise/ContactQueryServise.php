<?php
namespace App\Adapter\QueryServise;
require_once __DIR__ . '/../../../vendor/autoload.php';
use App\Infrastructure\Dao\ContactDao;
use App\Domain\Entity\Contact;
use App\Domain\ValueObject\ContactId;
use App\Domain\ValueObject\ContactTitle;
use App\Domain\ValueObject\Email;

final class ContactQueryServise
{
    /**
     * @var ContactDao
     */
    private $contactDao;

    public function __construct()
    {
        $this->contactDao = new ContactDao();
    }

    /**
     * @return Contact[]
     */
    public function findAll(): array
    {
        $contactMappers = $this->contactDao->fetchAllContactsData();
        $contacts = [];
        foreach ($contactMappers as $contactMapper) {
            $contacts[] = new Contact(
                new ContactId($contactMapper['id']),
                new ContactTitle($contactMapper['title']),
                new Email($contactMapper['email']),
                $contactMapper['content']
            );
        }
        return $contacts;
    }
}
