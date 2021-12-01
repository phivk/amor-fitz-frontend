@extends('layouts.default')
@section('title','Search results')
@section('meta_description', "Search results for your query" )
@section('meta_keywords', 'search,results,fitzwilliam,museum')

@section('content')
  <section class="mw9 mw9-ns center bg-white pa3 ph5-ns">
  @foreach($records as $record)
    @php
    switch($record['itemtype']){
      case 'Letter':
        $route = 'letter';
        break;
      case 'Person':
      case 'Place':
      case 'Family':
      case 'Event':
        $route = 'entity.detail';
        break;
      case 'Team':
        $route = 'team';
        break;
      default:
        $route = 'letter';
        break;
    }
    @endphp

    @if($loop->even)
      <article class="pv2 fl w-100 w-50-l pr0 pr2-l">
        <entity-card
        type="{{ $record['itemtype'] }}"
        title="{{ $record['title'][0]}}"
        link-text="Discover more"
        link-path="{{ route($route, $record['modelid']) }}"
        />
      </article>
    @endif
    @if($loop->odd)
      <article class="pv2 fl w-100 w-50-l pl0 pl2-l">
        <entity-card
        type="{{ $record['itemtype']  }}"
        title="{{ $record['title'][0]}}"
        link-text="Discover more"
        link-path="{{ route($route, $record['modelid'] ) }}"
        />
      </article>
    @endif
  @endforeach
</section>

<section class="mw8-ns center tc bg-white pa3 ph5-ns">
{{ $paginate->links('paginator.default') }}
</section>
@endsection
