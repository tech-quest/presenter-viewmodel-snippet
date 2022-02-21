<?php
namespace App\Controller;
require_once __DIR__ . '/../../vendor/autoload.php';
use App\UseCase\UseCaseInteractor\ContactInteractor;
use App\Presenter\ContactHistoryPresenter;

/**
 * お問い合わせ履歴の全件表示のコントローラ
 */
final class ContactHistoryController
{
    /**
     * @var ContactInteractor
     */
    private $contactInteractor;

    /**
     * コンストラクタ
     */
    public function __construct()
    {
        $this->contactInteractor = new ContactInteractor();
    }

    /**
     * お問い合わせ履歴の全件表示処理
     *
     * @return array
     */
    public function view(): array
    {
        $historyPresenter = new ContactHistoryPresenter(
            $this->contactInteractor->handler()
        );
        return $historyPresenter->createHistoryView();
    }
}
