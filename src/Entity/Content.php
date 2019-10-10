<?php

namespace App\Entity;

use DateTimeInterface;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ContentRepository")
 * @ORM\Table(name="content")
 */
class Content
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $asset_id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $slug;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $introtext;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $fulltext;

    /**
     * @ORM\Column(type="integer")
     */
    private $state;

    /**
     * @ORM\Column(type="integer")
     */
    private $catid;

    /**
     * @ORM\Column(type="datetime")
     */
    private $created;

    /**
     * @ORM\Column(type="integer")
     */
    private $created_by;

    /**
     * @ORM\Column(type="datetime")
     */
    private $modified;

    /**
     * @ORM\Column(type="integer")
     */
    private $modified_by;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $checked_out;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $checked_out_time;

    /**
     * @ORM\Column(type="datetime")
     */
    private $publish_up;

    /**
     * @ORM\Column(type="datetime")
     */
    private $publish_down;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $images;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $urls;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $attribs;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $version;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $parentid;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $ordering;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $metakey;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $metadesc;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $hits;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $metadata;

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return int|null
     */
    public function getAssetId(): ?int
    {
        return $this->asset_id;
    }

    /**
     * @param int|null $asset_id
     * @return Content
     */
    public function setAssetId(?int $asset_id): self
    {
        $this->asset_id = $asset_id;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return Content
     */
    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getSlug(): ?string
    {
        return $this->slug;
    }

    /**
     * @param string $slug
     * @return Content
     */
    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getIntrotext(): ?string
    {
        return $this->introtext;
    }

    /**
     * @param string|null $introtext
     * @return Content
     */
    public function setIntrotext(?string $introtext): self
    {
        $this->introtext = $introtext;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getFulltext(): ?string
    {
        return $this->fulltext;
    }

    /**
     * @param string|null $fulltext
     * @return Content
     */
    public function setFulltext(?string $fulltext): self
    {
        $this->fulltext = $fulltext;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getState(): ?int
    {
        return $this->state;
    }

    /**
     * @param int $state
     * @return Content
     */
    public function setState(int $state): self
    {
        $this->state = $state;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getCatid(): ?int
    {
        return $this->catid;
    }

    /**
     * @param int $catid
     * @return Content
     */
    public function setCatid(int $catid): self
    {
        $this->catid = $catid;

        return $this;
    }

    /**
     * @return DateTimeInterface|null
     */
    public function getCreated(): ?DateTimeInterface
    {
        return $this->created;
    }

    /**
     * @param DateTimeInterface $created
     * @return Content
     */
    public function setCreated(DateTimeInterface $created): self
    {
        $this->created = $created;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getCreatedBy(): ?int
    {
        return $this->created_by;
    }

    /**
     * @param int $created_by
     * @return Content
     */
    public function setCreatedBy(int $created_by): self
    {
        $this->created_by = $created_by;

        return $this;
    }

    /**
     * @return DateTimeInterface|null
     */
    public function getModified(): ?DateTimeInterface
    {
        return $this->modified;
    }

    /**
     * @param DateTimeInterface $modified
     * @return Content
     */
    public function setModified(DateTimeInterface $modified): self
    {
        $this->modified = $modified;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getModifiedBy(): ?int
    {
        return $this->modified_by;
    }

    /**
     * @param int $modified_by
     * @return Content
     */
    public function setModifiedBy(int $modified_by): self
    {
        $this->modified_by = $modified_by;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getCheckedOut(): ?int
    {
        return $this->checked_out;
    }

    /**
     * @param int|null $checked_out
     * @return Content
     */
    public function setCheckedOut(?int $checked_out): self
    {
        $this->checked_out = $checked_out;

        return $this;
    }

    /**
     * @return DateTimeInterface|null
     */
    public function getCheckedOutTime(): ?DateTimeInterface
    {
        return $this->checked_out_time;
    }

    /**
     * @param DateTimeInterface|null $checked_out_time
     * @return Content
     */
    public function setCheckedOutTime(?DateTimeInterface $checked_out_time): self
    {
        $this->checked_out_time = $checked_out_time;

        return $this;
    }

    /**
     * @return DateTimeInterface|null
     */
    public function getPublishUp(): ?DateTimeInterface
    {
        return $this->publish_up;
    }

    /**
     * @param DateTimeInterface $publish_up
     * @return Content
     */
    public function setPublishUp(DateTimeInterface $publish_up): self
    {
        $this->publish_up = $publish_up;

        return $this;
    }

    /**
     * @return DateTimeInterface|null
     */
    public function getPublishDown(): ?DateTimeInterface
    {
        return $this->publish_down;
    }

    /**
     * @param DateTimeInterface $publish_down
     * @return Content
     */
    public function setPublishDown(DateTimeInterface $publish_down): self
    {
        $this->publish_down = $publish_down;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getImages(): ?string
    {
        return $this->images;
    }

    /**
     * @param string|null $images
     * @return Content
     */
    public function setImages(?string $images): self
    {
        $this->images = $images;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getUrls(): ?string
    {
        return $this->urls;
    }

    /**
     * @param string|null $urls
     * @return Content
     */
    public function setUrls(?string $urls): self
    {
        $this->urls = $urls;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getAttribs(): ?string
    {
        return $this->attribs;
    }

    /**
     * @param string|null $attribs
     * @return Content
     */
    public function setAttribs(?string $attribs): self
    {
        $this->attribs = $attribs;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getVersion(): ?int
    {
        return $this->version;
    }

    /**
     * @param int|null $version
     * @return Content
     */
    public function setVersion(?int $version): self
    {
        $this->version = $version;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getParentid(): ?int
    {
        return $this->parentid;
    }

    /**
     * @param int|null $parentid
     * @return Content
     */
    public function setParentid(?int $parentid): self
    {
        $this->parentid = $parentid;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getOrdering(): ?int
    {
        return $this->ordering;
    }

    /**
     * @param int|null $ordering
     * @return Content
     */
    public function setOrdering(?int $ordering): self
    {
        $this->ordering = $ordering;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getMetakey(): ?string
    {
        return $this->metakey;
    }

    /**
     * @param string|null $metakey
     * @return Content
     */
    public function setMetakey(?string $metakey): self
    {
        $this->metakey = $metakey;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getMetadesc(): ?string
    {
        return $this->metadesc;
    }

    /**
     * @param string|null $metadesc
     * @return Content
     */
    public function setMetadesc(?string $metadesc): self
    {
        $this->metadesc = $metadesc;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getHits(): ?int
    {
        return $this->hits;
    }

    /**
     * @param int|null $hits
     * @return Content
     */
    public function setHits(?int $hits): self
    {
        $this->hits = $hits;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getMetadata(): ?string
    {
        return $this->metadata;
    }

    /**
     * @param string|null $metadata
     * @return Content
     */
    public function setMetadata(?string $metadata): self
    {
        $this->metadata = $metadata;

        return $this;
    }
}
