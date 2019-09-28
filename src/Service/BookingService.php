<?php


namespace App\Service;


use App\Entity\Booking;
use App\Entity\Place;
use App\Repository\BookingRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;

class BookingService
{
    /**
     * @var EntityManagerInterface
     */
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    /**
     * @param Booking $booking
     * @return bool
     * @throws \Exception
     */
    public function book(Booking $booking): bool
    {
        if ($this->isFree($booking, $booking->getPlace())) {
            $this->em->persist($booking);
            $this->em->flush();

            return true;
        }

        return false;
    }

    /**
     * @param Booking $booking
     * @param Place $place
     * @return bool
     */
    private function isFree(Booking $booking, Place $place): bool
    {
        return array_reduce(
            $place->getBookings(),
            static function (bool $isFree, Booking $item) use ($booking) {
                return $isFree && ($booking->getStart() >= $item->getFinish() || $booking->getFinish() <= $item->getStart());
            },
            true
        );
    }
}
