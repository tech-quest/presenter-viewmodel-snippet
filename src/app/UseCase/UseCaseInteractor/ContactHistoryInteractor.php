<?php
namespace App\UseCase\UseCaseInteractor;
require_once __DIR__ . '/../../../vendor/autoload.php';
use App\Adapter\QueryServise\ContactQueryServise;
use App\UseCase\UseCaseOutput\ContactHistoryOutput;

/**
 * お問い合わせ内容の全件表示のユースケース
 */
final class ContactHistoryInteractor
{
    /**
     * @var ContactQueryServise
     */
    private $contactQueryServise;

    /**
     * コンストラクタ
     */
    public function __construct()
    {
        $this->contactQueryServise = new ContactQueryServise();
    }

    /**
     * お問い合わせ内容の全件表示処理
     *
     * @return ContactHistoryOutput
     */
    public function handler(): ContactHistoryOutput
    {
        $contacts = $this->contactQueryServise->findAll();
        $contactHistoryOutput = new ContactHistoryOutput($contacts);
        return $contactHistoryOutput;
    }
}
