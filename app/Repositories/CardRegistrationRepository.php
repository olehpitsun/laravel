<?php
/**
 * Created by PhpStorm.
 * User: oleh
 * Date: 20.10.16
 * Time: 18:45
 */

namespace App\Repositories;

use App\Models\Card;

class CardRegistrationRepository extends BaseRepository
{
    /**
     * Create a new ContactRepository instance.
     *
     * @param  \App\Models\Contact $contact
     * @return void
     */
    public function __construct(Card $card)
    {
        $this->model = $card;
    }

    /**
     * Get contacts collection.
     *
     * @return Illuminate\Support\Collection
     */
    public function getContactsOrder()
    {
        return $this->model->oldest('seen')->latest()->get();
    }

    /**
     * Store a contact.
     *
     * @param  array $inputs
     * @return void
     */
    public function store($inputs)
    {
        $this->model->create($inputs);
    }

    /**
     * Update a contact.
     *
     * @param  bool  $seen
     * @param  int   $id
     * @return void
     */
    public function update($seen, $id)
    {
        $card = $this->getById($id);

        $card->seen = $seen == 'true';

        $card->save();
    }
}