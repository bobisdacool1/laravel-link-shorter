<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreShortenedLinkRequest;
use App\Models\ShortenedLink;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Response;

class ShortenedLinkController extends Controller
{
    public function create(): Response
    {
        return response()
            ->view('links.create');
    }

    public function store(StoreShortenedLinkRequest $request): JsonResource
    {
        $request->validated();

        $shortedLink = new ShortenedLink();
        $shortedLinkId = $shortedLink->generateUniqueShortLinkId();

        $shortedLink->full_link = $request->input('full_link');
        $shortedLink->short_link_id = $shortedLinkId;
        $shortedLink->saveOrFail();

        return new JsonResource([
            'short_link' => route('link.redirect', ['shortLinkId' => $shortedLinkId]),
        ]);
    }

    public function redirectToFullLink(string $shortLinkId): RedirectResponse
    {
        $shortenedLink = ShortenedLink::where('short_link_id', $shortLinkId)->firstOrFail();

        return response()->redirectTo($shortenedLink->full_link);
    }
}
