<?php
/**
 * LApolinario
 *
 * @category  LApolinario
 * @package   Ava
 * @version   1.0.0
 * @author    Luiz Felipe Apolinário <luizfelipeapo@gmail.com>
 */

declare(strict_types=1);

namespace LApolinario\Ava\Grid\Tools;

use LApolinario\Ava\Grid;
use Illuminate\Pagination\LengthAwarePaginator;

class Paginator extends AbstractTool
{
    /**
     * @var \Illuminate\Pagination\LengthAwarePaginator
     */
    protected $paginator = null;

    /**
     * @var bool
     */
    protected $perPageSelector = true;

    /**
     * Create a new Paginator instance.
     *
     * @param Grid $grid
     */
    public function __construct(Grid $grid, $perPageSelector = true)
    {
        $this->grid = $grid;
        $this->perPageSelector = $perPageSelector;

        $this->initPaginator();
    }

    /**
     * Initialize work for Paginator.
     *
     * @return void
     */
    protected function initPaginator()
    {
        $this->paginator = $this->grid->model()->eloquent();

        if ($this->paginator instanceof LengthAwarePaginator) {
            $this->paginator->appends(request()->all());
        }
    }

    /**
     * Get Pagination links.
     *
     * @return string
     */
    protected function paginationLinks()
    {
        return $this->paginator->render('admin::pagination');
    }

    /**
     * Get per-page selector.
     *
     * @return PerPageSelector
     */
    protected function perPageSelector()
    {
        if (!$this->perPageSelector) {
            return;
        }

        return new PerPageSelector($this->grid);
    }

    /**
     * Get range infomation of paginator.
     *
     * @return string|\Symfony\Component\Translation\TranslatorInterface
     */
    protected function paginationRanger()
    {
        $parameters = [
            'first' => $this->paginator->firstItem(),
            'last'  => $this->paginator->lastItem(),
            'total' => $this->paginator->total(),
        ];

        $parameters = collect($parameters)->flatMap(function ($parameter, $key) {
            return [$key => "<b>$parameter</b>"];
        });

        return trans('admin.pagination.range', $parameters->all());
    }

    /**
     * Render Paginator.
     *
     * @return string
     */
    public function render()
    {
        if (!$this->grid->showPagination()) {
            return '';
        }

        return $this->paginationRanger().
            $this->paginationLinks().
            $this->perPageSelector();
    }
}
