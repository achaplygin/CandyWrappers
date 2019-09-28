<?php


namespace App\Service;


use App\Entity\Booking;
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
        $bookings = $booking->getPlace()->getBookings();
        $isFree = true;
        foreach ($bookings as $item) {
            $isFree = $isFree && ($booking->getStart() >= $item->getFinish() || $booking->getFinish() <= $item->getStart());
        }
        if ($isFree) {
            $this->em->persist($booking);
            $this->em->flush();

            return true;
        }

        return false;
    }
}